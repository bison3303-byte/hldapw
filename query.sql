USE db_pembelian;

-- SHOW TABLES;

DESC datapenjualan;

-- SELECT *
-- FROM `penjualan`;

-- SELECT *
-- FROM `datapenjualan`;


-- INSERT INTO datapenjualan VALUES
--   (NULL, '2022-10-17', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG02', 'Kaos', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG02', 'Kaos', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG02', 'Kaos', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000),
--   (NULL, '2022-10-17', 'BRG02', 'Kaos', 23, 12, 70000, 90000, 20000);

-- SELECT SUM(`stok_terjual`) AS terjual, SUM(`stok_sisa`) AS sisa
-- FROM datapenjualan;
SELECT * fROM datapenjualan;

-- FROM datapenjualan WHERE tanggal >= '2022-1-1' AND tanggal < '2022-12-31'
