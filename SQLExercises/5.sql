-- escaping or renaming the 'system_user' table should be considered, due to possible collision with reserved key of many SQL databases.

SELECT u.*
FROM `system_user` u
LEFT JOIN system_user_has_atribute ua ON u.system_user_id = ua.system_user_id
GROUP BY u.system_user_id
HAVING count(ua.system_user_id) = 3;