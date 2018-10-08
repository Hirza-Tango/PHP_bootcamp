SELECT title, DATEDIFF(last_projection, release_date) as "uptime"
FROM db_dslogrov.film;