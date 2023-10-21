def factorial(n):
    f = 1
    for i in range(1, n + 1, 1):
        f*=i
    return f


def fibonacci(n):
    a = 0
    b = 1
    c = a + b
    print(a)
    print(b)
    while c <= n:
        print(c)
        a = b
        b = c
        c = a + b


def capital(c0, n, x):
    currentCapital = c0
    for i in range(1, n + 1):
        currentCapital = (1 + x) * currentCapital
        print(f"Capital año {i}: {currentCapital}")
    return currentCapital


# print("Factorial " + str(factorial(4)))

print("Serie Fibonacci")    
fibonacci(9)

# num_year = 5
# amount = 5000
# percentage = 0.1
# print(f"Capital en {num_year} años al {percentage * 100}% de interés anual: {capital(amount, num_year, percentage)}")

