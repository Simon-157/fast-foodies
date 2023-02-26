
DROP DATABASE IF EXISTS fastfoodies;
CREATE DATABASE fastfoodies;
USE fastfoodies;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL UNIQUE,
    profileImg VARCHAR(255) DEFAULT 'https://i.pravatar.cc/75',
    user_address VARCHAR(255) NOT NULL DEFAULT("Accra Ghana"),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE restaurants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    res_name VARCHAR(255) NOT NULL,
    res_address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    res_email VARCHAR(255) NOT NULL UNIQUE,
    uniquecode INT NOT NULL unique,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE menu (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT(11) UNSIGNED NOT NULL,
    food_name VARCHAR(255) NOT NULL,
    food_description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT(11) NOT NULL,
    food_imgUrl VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
);


CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    menu_id INT NOT NULL,
    status ENUM('pending', 'confirmed', 'delivered', 'cancelled') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, restaurant_id, menu_id),
    INDEX (user_id),
    INDEX (restaurant_id),
    INDEX (menu_id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE
);

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, menu_id),
    INDEX (user_id),
    INDEX (menu_id)
);


CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('credit_card', 'debit_card', 'paypal', 'cash') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
     INDEX (order_id)
);


INSERT INTO restaurants (res_name, res_address, phone_number, res_email, uniquecode)
VALUES
('Burger Joint', '123 Main St, Anytown USA', '555-1234', 'burgerjoint@example.com', 1001),
('Pizzeria', '456 First Ave, Anytown USA', '555-5678', 'pizzeria@example.com', 1002),
('Indian Restaurant', '789 Second St, Anytown USA', '555-9012', 'indianrestaurant@example.com', 1003),
('Sushi Bar', '012 Third Ave, Anytown USA', '555-3456', 'sushibar@example.com', 1004),
('Mexican Restaurant', '345 Fourth St, Anytown USA', '555-7890', 'mexicanrestaurant@example.com', 1005);
('Mexican Restaurant', '345 Fourth Arena, Anytown USA', '555-7890', 'mexicanrestaurant@example.com', 1005);

INSERT INTO menus (restaurant_id, name, description, price)
VALUES
(1, 'Cheeseburger', 'Juicy beef patty with melted cheese', 9.99),
(1, 'Fries', 'Crispy and golden fries', 3.99),
(1, 'Milkshake', 'Creamy vanilla milkshake', 4.99),
(2, 'Margherita Pizza', 'Classic pizza with tomato sauce and mozzarella cheese', 12.99),
(2, 'Caesar Salad', 'Romaine lettuce with croutons, parmesan cheese and caesar dressing', 8.99),
(2, 'Garlic Bread', 'Toasty garlic bread with a sprinkle of parsley', 3.99),
(3, 'Chicken Tikka Masala', 'Grilled chicken in creamy tomato sauce', 14.99),
(3, 'Naan Bread', 'Soft and fluffy bread', 2.99),
(3, 'Samosa', 'Crispy pastry filled with spiced vegetables or meat', 5.99),
(4, 'Sushi Roll', 'Assorted fresh fish and vegetables wrapped in rice and seaweed', 16.99);




INSERT INTO menu (restaurant_id, food_name, food_description, price, quantity, food_imgUrl) VALUES
(1, 'Grilled Salmon', 'Freshly caught grilled salmon with mixed vegetables', 25.99, 10, 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=400'),
(1, 'Pesto Pasta', 'Penne pasta with homemade pesto sauce and cherry tomatoes', 15.99, 15, 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg?auto=compress&cs=tinysrgb&w=400'),
(1, 'Classic Caesar Salad', 'Romaine lettuce, croutons, shaved parmesan cheese, and classic Caesar dressing', 12.99, 20, 'https://images.pexels.com/photos/699953/pexels-photo-699953.jpeg?auto=compress&cs=tinysrgb&w=400'),
(1, 'New York Cheesecake', 'Classic creamy cheesecake with graham cracker crust', 8.99, 12, 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=400'),
(2, 'Kung Pao Chicken', 'Spicy stir-fry dish with chicken, peanuts, and vegetables', 18.99, 10, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=400'),
(2, 'Beef and Broccoli', 'Stir-fry dish with tender beef and broccoli in a savory sauce', 19.99, 10, 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=400'),
(2, 'Vegetable Fried Rice', 'Fluffy fried rice with mixed vegetables', 10.99, 20, 'https://images.pexels.com/photos/5768972/pexels-photo-5768972.jpeg?auto=compress&cs=tinysrgb&w=400'),
(2, 'Fortune Cookies', 'Classic crispy cookies with fortunes inside', 2.99, 30, 'https://images.pexels.com/photos/15532964/pexels-photo-15532964.jpeg?auto=compress&cs=tinysrgb&w=400'),
(3, 'Margherita Pizza', 'Classic pizza with tomato sauce, fresh mozzarella, and basil', 14.99, 8, 'https://images.pexels.com/photos/1337825/pexels-photo-1337825.jpeg?auto=compress&cs=tinysrgb&w=400'),
(3, 'Pepperoni Pizza', 'Classic pizza with tomato sauce, pepperoni, and mozzarella cheese', 16.99, 10, 'https://images.pexels.com/photos/15476360/pexels-photo-15476360.jpeg?auto=compress&cs=tinysrgb&w=400'),
(3, 'Caesar Salad', 'Classic Caesar salad with romaine lettuce, croutons, and parmesan cheese', 12.99, 15, 'https://images.pexels.com/photos/15476372/pexels-photo-15476372.jpeg?auto=compress&cs=tinysrgb&w');


INSERT INTO menu (restaurant_id, food_name, food_description, price, quantity, food_imgUrl) 
VALUES 
(10, 'Miso Soup', 'Traditional Japanese soup with tofu, seaweed, and green onions', 4.99, 10, 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Teriyaki Chicken', 'Grilled chicken with teriyaki sauce, served with rice and steamed vegetables', 12.99, 5, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Beef Stir Fry', 'Stir-fried beef with mixed vegetables, served with rice', 14.99, 8, 'https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Spicy Tuna Roll', 'Sushi roll with spicy tuna, cucumber, and avocado', 8.99, 12, 'https://images.pexels.com/photos/5768972/pexels-photo-5768972.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'California Roll', 'Sushi roll with crab, avocado, and cucumber', 6.99, 10, 'https://images.pexels.com/photos/15532964/pexels-photo-15532964.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Salmon Sashimi', 'Thinly sliced fresh salmon', 15.99, 4, 'https://images.pexels.com/photos/1337825/pexels-photo-1337825.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Tuna Sashimi', 'Thinly sliced fresh tuna', 17.99, 4, 'https://images.pexels.com/photos/15476360/pexels-photo-15476360.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Green Tea Ice Cream', 'Creamy green tea-flavored ice cream', 4.99, 6, 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Mochi', 'Chewy rice cake filled with ice cream', 3.99, 8, 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg?auto=compress&cs=tinysrgb&w=400'),
(10, 'Matcha Latte', 'Creamy and frothy green tea latte', 5.99, 10, 'https://images.pexels.com/photos/699953/pexels-photo-699953.jpeg?auto=compress&cs=tinysrgb&w=400');

