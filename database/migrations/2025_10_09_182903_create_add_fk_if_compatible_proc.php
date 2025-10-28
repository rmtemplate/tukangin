<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`root`@`localhost` PROCEDURE `add_fk_if_compatible`(
  IN tbl VARCHAR(64),
  IN col VARCHAR(64),
  IN reftbl VARCHAR(64),
  IN refcol VARCHAR(64)
)
BEGIN
  DECLARE src_type VARCHAR(64);
  DECLARE ref_type VARCHAR(64);

  SELECT COLUMN_TYPE INTO src_type
    FROM INFORMATION_SCHEMA.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = tbl AND COLUMN_NAME = col
   LIMIT 1;

  SELECT COLUMN_TYPE INTO ref_type
    FROM INFORMATION_SCHEMA.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = reftbl AND COLUMN_NAME = refcol
   LIMIT 1;

  IF src_type IS NULL OR ref_type IS NULL THEN
    INSERT INTO _fk_warnings(msg)
    VALUES (CONCAT('Skip FK ', tbl, '.', col, ' -> ', reftbl, '.', refcol, ' (column not found)'));
  ELSEIF src_type = ref_type THEN
    SET @stmt = CONCAT('ALTER TABLE `', tbl, '` ADD FOREIGN KEY (`', col, '`) REFERENCES `', reftbl, '` (`', refcol, '`)');
    PREPARE s FROM @stmt;
    EXECUTE s;
    DEALLOCATE PREPARE s;
  ELSE
    INSERT INTO _fk_warnings(msg)
    VALUES (CONCAT('SKIPPED (type mismatch): ', tbl, '.', col, ' (', src_type, ') -> ', reftbl, '.', refcol, ' (', ref_type, ')'));
  END IF;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS add_fk_if_compatible");
    }
};
