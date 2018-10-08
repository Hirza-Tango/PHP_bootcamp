SELECT last_name, first_name
FROM db_dslogrov.member a JOIN db_dslogrov.user_card b ON a.id_user_card=b.id_user
WHERE last_name LIKE "%-%"
OR first_name LIKE "%-%"
ORDER BY last_name ASC, first_name ASC;