/* adds the below select results into a new table (temp_table_2) */
CREATE TABLE temp_table_2 AS 
    /* get unique list of users in temp_table (from 3 criteria: userFirstname, userSurname, userEmail) */
    /* eventId's are already unique from import (via Laravel migration) */
    SELECT
        DENSE_RANK() OVER(ORDER BY "userFirstname", "userSurname", "userEmail") AS "userId",
        "userFirstname",
        "userSurname",
        "userEmail",
        "eventId",
        "eventDate",
        "eventType",
        "eventMessage"
    FROM temp_table;

/* USERS
target table & columns: */
INSERT INTO user_table ("userId", "userFirstname", "userSurname", "userEmail")
    /* source columns */
    SELECT DISTINCT "userId", "userFirstname", "userSurname", "userEmail"
    /* source table */
    FROM temp_table_2;

/* USER_EVENTS
target table & columns */
INSERT INTO user_events_table ("eventId", "userId", "eventDate", "eventType", "eventMessage")
    /* source columns */
    SELECT "eventId", "userId", "eventDate", "eventType", "eventMessage"
    /* source table */
    FROM temp_table_2;

/* drop temp tables */
DROP TABLE temp_table;

DROP TABLE temp_table_2;