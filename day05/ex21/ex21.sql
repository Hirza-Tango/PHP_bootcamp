SELECT MD5(CONCAT(REPLACE(phone_number, "7", "9"),"42")) as "ft5"
FROM db_dslogrov.distrib
WHERE id_distrib=84;