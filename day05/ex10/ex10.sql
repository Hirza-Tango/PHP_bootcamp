SELECT title as "Title", summary as "Summary", prod_year
FROM db_dslogrov.film a JOIN db_dslogrov.genre b
ON a.id_genre=b.id_genre
WHERE b.name = "erotic"
ORDER BY prod_year DESC;