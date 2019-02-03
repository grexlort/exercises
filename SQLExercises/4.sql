-- escaping or renaming the 'date' field should be considered, due to possible collision with reserved key of many SQL databases.

-- MySQL
SELECT
  b.title,
  count(r.rent_id) as number_of_rents_in_range
FROM book b
LEFT JOIN rent r ON
  b.book_id = r.book_id AND
  YEAR(r.date) = '2008'
GROUP BY b.book_id;

-- SQL Standard
SELECT
  b.title,
  count(r.rent_id) as number_of_rents_in_range
FROM book b
LEFT JOIN rent r ON
  b.book_id = r.book_id AND
  r.date >= '2008-01-01' AND
  r.date <= '2008-12-31'
GROUP BY b.book_id;

-- Sub-query version based on SQL Standard, use in case of possible optimisation when joining big amount of data
SELECT
	b.title,
    (
    	SELECT count(r.rent_id) FROM rent r
        WHERE
          r.book_id = b.book_id AND
          r.date >= '2008-01-01' AND
          r.date <= '2008-12-31'
    ) AS number_of_rents_in_range
FROM book b;
