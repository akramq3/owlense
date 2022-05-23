DROP PROCEDURE IF EXISTS create_date_for_year;
DELIMITER //
CREATE PROCEDURE create_date_for_year (IN year INT)
BEGIN
   DECLARE day INT DEFAULT 1;
   SET day=1;
   WHILE day < 366 DO
       IF WEEKDAY(MAKEDATE(year, day)) NOT IN (5,6) THEN -- skip sat and sun
           INSERT INTO available_time (available_start_time, available_end_time , Photographer_User_User_email) VALUES (
               CONCAT(MAKEDATE(year, day), ' ', MAKETIME(8,0,0)),
               CONCAT(MAKEDATE(year, day), ' ', MAKETIME(10,0,0)),
               'ahmedsami3@gmail.com'
               );
       END IF;
       SET day = day + 1;
   END WHILE;
END;
//
