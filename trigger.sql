USE SpaceReservation;

delimiter //
create trigger no_overlap
before insert on AllReservations
for each row
begin
  if exists (select * from AllReservations
             where start_time <= new.end_time
             and end_time >= new.start_time) then
    signal sqlstate '45000' SET MESSAGE_TEXT = 'Overlaps with existing data';
  end if;
end;
delimiter ;
