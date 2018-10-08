SELECT
	COUNT(*) as "nb_susc",
	floor(AVG(price)) as "av_susc",
	SUM(duration_sub % 42) as "ft"
FROM
	db_dslogrov.subscription;