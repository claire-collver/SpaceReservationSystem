DROP SCHEMA IF EXISTS SpaceReservation;
CREATE SCHEMA SpaceReservation;
USE SpaceReservation;

CREATE TABLE Rooms
(building VARCHAR(20) NOT NULL CHECK (building in('Sloan' , 'Wall' , 'Chambers', 'Library')),
roomNumber VARCHAR(10) NOT NULL,
floorNum  INT NOT NULL,
capacity INT CHECK (capacity > 0) ,
outlets INT NOT NULL,
currAvailability  VARCHAR(10) CHECK (currAvailability in ('Reserved' , 'Free')),
technology VARCHAR(300),
PRIMARY KEY (roomNumber)
);

CREATE TABLE AllReservations
(building VARCHAR(20) NOT NULL CHECK (building in('Sloan' , 'Wall' , 'Chambers', 'Library')),
roomNumber VARCHAR(10) not null,
reserveDate DATE,
start_time TIME,
end_time TIME,
PRIMARY KEY (roomNumber, building, reserveDate, start_time)
);
