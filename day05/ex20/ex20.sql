SELECT a.id_genre as "id_genre", c.name as "name_genre", a.id_distrib as "id_distrib", b.name as "name_distrib", a.title as "title_film"
FROM db_dslogrov.film a
LEFT JOIN db_dslogrov.distrib b ON a.id_distrib=b.id_distrib
LEFT JOIN db_dslogrov.genre c ON a.id_genre=c.id_genre
WHERE a.id_genre BETWEEN 4 AND 8;