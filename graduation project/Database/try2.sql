 
update profile_photo 
set profile_photo ='ahmed' where Photographer_User_User_email = 'akram@gmail.com';
select * from profile_photo;
SELECT  User_email FROM User WHERE User_city = 'dokki' and User_type = 'photographer' ;
SELECT  User_User_email FROM Photographer WHERE Photographer_studio = 'dokki';

SELECT User_User_email, User_rate FROM rating
WHERE User_rate = (SELECT Max(User_rate) FROM rating  ) and User_type ='photographer';

SELECT Photographer_User_User_email, max(give_rate) from give_rate where give_rate in (SELECT sum(give_rate) /count(Client_User_User_email) FROM give_rate  );


SELECT  Photographer_User_User_email,max(give_rate) 
from give_rate
where   (SELECT sum(give_rate) /count(Client_User_User_email) FROM give_rate)
and Photographer_User_User_email = 'khalidhussien3@gmail.com';



INSERT INTO rating (User_rate, User_User_email, User_type)
SELECT sum(give_rate) /count(Client_User_User_email) , Photographer_User_User_email, 'photographer' FROM give_rate
where Photographer_User_User_email = 'akramsaber45@gmail.com';

/*IMPORTANT*/


INSERT INTO rating (User_rate, User_User_email, User_type)
SELECT sum(give_rate) /count(Client_User_User_email) , Photographer_User_User_email, 'photographer' FROM give_rate
where Photographer_User_User_email = 'ahmedsami3@gmail.com';

/*IMPORTANT*/

delete from rating where User_User_email = 'ahmedsami3@gmail.com';
 

select * from rating;
delete from rating where User_type ='photographer';
SELECT  Photographer_User_User_email,max(new) 
from give_rate
where(select sum(give_rate) /count(Client_User_User_email) new from give_rate)
group by Photographer_User_User_email;   

insert into give_rate values('26','1','eslammahdy3@gmail.com','akramsaber45@gmail.com');
insert into rating values(sum(give_rate) /count(Client_User_User_email),'akramsaber45@gmail.com','photographer');


  update rating
        set user_rate = sum(user_rate) /count(User_User_email)  
        where User_User_email = 'akramsaber45@gmail.com' ;
        
        
        select  * from user
      inner join portrait_Category on Photo_Categories_Photographer_User_User_email = user.User_email
      where Photo_Categories_Categories_Categories_type in(
      select  Photo_Categories_Categories_Categories_type
      from portrait_Category
      where Photo_Categories_Categories_Categories_type ='portrait') and portrait_Category_id = 1 ;

        select  * from profile_photo
      inner join nature on Photo_Categories_Photographer_User_User_email = profile_photo.Photographer_User_User_email
      where Photo_Categories_Categories_Categories_type in(
      select  Photo_Categories_Categories_Categories_type
      from nature
      where Photo_Categories_Categories_Categories_type ='nature') and nature_Category_id = 1 ;

 select * from photographer , available_time, photo_categories
      where available_time.Photographer_User_User_email = 'mostafamorsy30@gmail.com' 
      and User_User_email = 'mostafamorsy30@gmail.com'
      and photo_categories.Photographer_User_User_email = 'mostafamorsy30@gmail.com';
      
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
select * from available_time;
select * from verification where User_User_email ="akramsaber45@gmail.com";



DROP PROCEDURE IF EXISTS category;
DELIMITER //
CREATE PROCEDURE category ()
BEGIN
   DECLARE id INT DEFAULT 1;
   SET id=0;
   WHILE id < count(portrait_Category_id) DO
       IF WEEKDAY(MAKEDATE(year, day)) NOT IN (3,4) THEN -- skip thursday and friday
           INSERT INTO portrait_Category (portrait_Category_id, Photo_Categories_Categories_Categories_type,Photo_Categories_Photographer_User_User_email )
           VALUES (
               id ,  type,  photographer);
       END IF;
       SET id = id + 1;
   END WHILE;
END;
//
call create_date_for_year(2022);
select * from available_time;

INSERT INTO Photo_Categories
                         VALUES('$category','$Photographer_User_User_email')
                         
INSERT INTO Photo_Categories
                 VALUES('product','akram@gem');
                 select * from Photo_Categories;
                 
DROP PROCEDURE IF EXISTS create_date_for_year;
DELIMITER //
CREATE PROCEDURE create_date_for_year (IN year INT ,IN photographer varchar ,IN work_start TIME , IN work_end TIME)
BEGIN

   DECLARE day INT DEFAULT 1;
   SET day=180;
   WHILE day < 366 DO
       IF WEEKDAY(MAKEDATE(year, day)) NOT IN (3,4) THEN -- skip thursday and friday
           INSERT INTO available_time (available_start_time, available_end_time , Photographer_User_User_email , work_time_start, work_time_end)
           VALUES (
               CONCAT(MAKEDATE(year, day), ' ', work_start),
               CONCAT(MAKEDATE(year, day), ' ', work_end),
               photographer, work_start , work_end
             );
       END IF;
       SET day = day + 1;
   END WHILE;
END;
//

select Categories_Categories_type from Photo_Categories
where Photographer_User_User_email = 'akramsaber45@gmail.com';