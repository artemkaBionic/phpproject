# phpproject
some mini market on php session
shop task in PHP:

so let's say there are 4 products in the internet shop, apple for 0.3$, beer for 2$, water for 1$ and cheese for 3.74$, stored in
Mysql DB

Create a simple interface where i can

required functions:

- i can add/remove products to my virtual cart in any quantities
- i can see my current cart status
- i have to choose transport type from some select, 'pick up' costs 0$, 'UPS' costs 5$, by default it's not chosen, and if i don't
choose it, it says i have to when i click 'pay'
- i can click 'pay', which will deduct costs from my current cash (my cash is 100$) , and will write the price and the rest
received.
nice to have functions, but not required:
- near each product there is rating from 1 to 5, i can rate it and i see current average rating of each product. Rates are saved
between each visists and they stay saved. Please store them in Mysql DB.
