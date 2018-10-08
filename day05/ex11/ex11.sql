SELECT last_name AS "NAME", first_name, price
FROM db_dslogrov.member a JOIN db_dslogrov.subscription b
ON a.id_sub=b.id_sub
JOIN db_dslogrov.user_card c
ON a.id_user_card=c.id_user
WHERE price > 42
ORDER BY last_name ASC, first_name ASC;