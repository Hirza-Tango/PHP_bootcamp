SELECT title, summary FROM db_dslogrov.film
WHERE LOWER(summary) LIKE "%vincent%"
ORDER BY id_film ASC;