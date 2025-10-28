<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Category
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $description
 * @property bool|null $is_active
 * @property int|null $sort_order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';

	protected $casts = [
		'is_active' => 'bool',
		'sort_order' => 'int'
	];

	protected $fillable = [
        'code','name','slug','description','is_active','sort_order',
        'icon_mobile','banner_desktop',
    ];

	public function services()
	{
		return $this->hasMany(Service::class);
	}

	// samakan dengan panjang kolom slug pada migrasi (80 pada contohmu)
    public const SLUG_MAX = 80;

    protected static function booted()
    {
        // Buat slug saat create
        static::creating(function (Category $model) {
            $source = $model->slug ?: $model->name ?: $model->code ?: 'category';
            $model->slug = static::makeUniqueSlug($source);
        });

        // Opsional: saat update. Di sini slug hanya diganti jika:
        // - user mengganti kolom slug secara manual, ATAU
        // - name berubah DAN slug sebelumnya kosong.
        // (Kalau kamu ingin slug "tetap" dan tidak berubah ketika name berubah, biarkan seperti ini.)
        static::updating(function (Category $model) {
            if ($model->isDirty('slug')) {
                $model->slug = static::makeUniqueSlug($model->slug, $model->id);
            } elseif ($model->isDirty('name') && empty($model->getOriginal('slug'))) {
                $model->slug = static::makeUniqueSlug($model->name, $model->id);
            }
        });
    }

    /**
     * Hasil:
     *  - "Cat" -> "cat"
     *  - jika "cat" sudah dipakai -> "cat-2"
     *  - jika "cat","cat-2","cat-3" ada -> "cat-4"
     */
    public static function makeUniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        if ($base === '') {
            $base = 'n-a';
        }

        // Ambil semua slug yang berbagi prefix sama: "cat" atau "cat-%"
        $query = static::query()->where(function ($q) use ($base) {
            $q->where('slug', $base)
              ->orWhere('slug', 'LIKE', $base.'-%');
        });

        // Saat update, abaikan id sekarang supaya tidak bentrok dengan diri sendiri
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        // NOTE (SoftDeletes):
        // Jika model ini pakai SoftDeletes dan kamu TIDAK ingin mendaur ulang slug lama,
        // ubah ke: static::withTrashed()->where(...)
        $existing = $query->pluck('slug');

        // Jika "cat" belum ada sama sekali, pakai "cat"
        if (!$existing->contains($base)) {
            return static::fitLength($base, '');
        }

        // Kumpulkan angka suffix yang sudah ada: "cat-2", "cat-10", dst.
        $nums = [];
        foreach ($existing as $s) {
            if (preg_match('/^'.preg_quote($base, '/').'-(\d+)$/', $s, $m)) {
                $nums[] = (int) $m[1];
            }
        }

        // Mulai dari 2 sesuai kebutuhanmu (bukan -1)
        $next = empty($nums) ? 2 : max(2, max($nums) + 1);
        $suffix = '-'.$next;

        $baseFitted = static::fitLength($base, $suffix);

        return $baseFitted.$suffix;
    }

    /**
     * Pastikan total panjang (base + suffix) tidak melebihi batas kolom.
     */
    protected static function fitLength(string $base, string $suffix): string
    {
        $maxLen = self::SLUG_MAX; // 80 by default
        $allowed = $maxLen - strlen($suffix);
        if (strlen($base) > $allowed) {
            $base = substr($base, 0, $allowed);
            $base = rtrim($base, '-');
        }
        return $base;
    }
}
