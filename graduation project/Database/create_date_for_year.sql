DROP PROCEDURE IF EXISTS create_date_for_year;
DELIMITER //
CREATE PROCEDURE create_date_for_year (IN year INT )
BEGIN
   DECLARE day INT DEFAULT 1;
   SET day=180;
   WHILE day < 366 DO
       IF WEEKDAY(MAKEDATE(year, day)) NOT IN (3,4) THEN -- skip thursday and friday
           INSERT INTO available_time (available_start_time, available_end_time , Photographer_User_User_email , work_time_start, work_time_end)
           VALUES (
               CONCAT(MAKEDATE(year, day), ' ', '11:00:00'),
               CONCAT(MAKEDATE(year, day), ' ', '12:00:00'),
               'akramsaber45@gmail.com', '11:00:00' , '12:00:00'
             );
       END IF;
       SET day = day + 1;
   END WHILE;
END;
//
call create_date_for_year(2022);
 