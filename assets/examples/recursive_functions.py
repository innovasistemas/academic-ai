# Factorial recursivo
def recursive_factorial(n):
    if n == 0:
        return 1
    else: 
        return n * recursive_factorial(n - 1)


# Fibonacci recursivo
def recursive_fibonacci(n):
    if n < 2:
        f = n
    else:
        f = recursive_fibonacci(n - 1) + recursive_fibonacci(n - 2)
    return f


# Cálculo capital recursivo
def recursive_capital(amount, num_year, percentage):
    if num_year == 0:
        currentCapital = amount 
    else:
        currentCapital = (1 + percentage) * recursive_capital(amount, num_year - 1, percentage)
    return currentCapital


n = 8

# print(f"Factorial recursivo:\n {n}! = " + str(recursive_factorial(n)))  

# print("\nSerie Fibonacci recursiva\n")  
# for i in range(n + 1):
#     print(recursive_fibonacci(i))


amount = 5000
percentage = 0.1

print("\nCálculo capital recursivo\n")  
for i in range(6):
    print(f"Capital en {i} años al {percentage * 100}% de interés anual: {recursive_capital(amount, i, percentage)}")