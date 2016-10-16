insert into measurementunits values 
('PC', 'Piece'), ('SLC', 'Slice'), ('KG', 'Kilogram'), ('G', 'Gram'),
('LT', 'Liter'), ('ML', 'Milliliter'), ('OZ', 'Ounces'), ('LVS', 'Leaves');

insert into dishes  values 
(1, 'Spaghetti','Spaghetti is a long, thin, cylindrical, solid pasta. It is a staple food of traditional Italian cuisine', 12), 
(2, 'Hamburger','Hamburger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. Hamburgers may be cooked in a variety of ways, including pan-frying, barbecuing, and flame-broiling. ', 10),
(3, 'Hot dog','A hot dog is a cooked sausage, traditionally grilled or steamed and served in a sliced bun as a sandwich', 4 );

insert into ingredients values 
(1, 'Hot Dog Bread', 'PC'), (2,'Sausage','PC'), (3, 'Tomato', 'SLC'),
(4, 'Hamburger Buns', 'PC'), (5, 'Hamburger Meat', 'PC'), (6, 'Lettuce', 'SLC'),
(7,'Pasta', 'G'), (8, 'Tomato Sauce', 'ML'), (9, 'Meat balls', 'PC'), (10, 'Tomato Diced', 'G');


insert into dish_ingredients values 
(1, 3, 1), (2, 3, 1), (10, 3, 2), (4, 2, 1), (5, 2, 1), (6, 2, 3), (7, 1, 500), (8, 1, 300), (9, 1, 5);

