class Person:
    # Atributos de clase
    name = ""
    age = 0

    # Constructor
    def __init__(self) -> None:
        pass

    # Métodos de clase
    def setName(self, name) -> None:
        self.name = name
    
    def setAge(self, age) -> None:
        self.age = age
    
    def getName(self) -> str:
        return self.name
    
    def getAge(self) -> int:
        return self.age
    
    def adult(self) -> bool: 
        if (self.age >= 18):
            return True
        else:
            return False
    
    
per = Person()
per.setName(input("Nombre: "))
per.setAge(int(input("Edad: ")))
print("Datos ingresados")
print(f"Nombre: {per.getName()}")
print(f"Edad: {per.getAge()}")
if per.adult():
    print(f"{per.getName()} es mayor de edad")
else:
    print(f"{per.getName()} es menor de edad")

