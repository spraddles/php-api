COPY temp_table ("userFirstname", "userSurname", "userEmail", "eventDate", "eventType", "eventMessage") from 'database/seeders/sample_data.csv' DELIMITER ',' CSV HEADER;