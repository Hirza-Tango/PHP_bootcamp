SELECT REVERSE(TRIM(LEADING "0" FROM phone_number)) as "rebmunenohp"
FROM db_dslogrov.distrib
WHERE phone_number LIKE "05%";