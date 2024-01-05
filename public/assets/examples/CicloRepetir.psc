Algoritmo CicloRepetir
	Definir totPersona, totGanador, totPerdedor Como Entero
	Definir nota, ptjeGanador, ptjePerdedor Como Real
	Definir codigo, opc Como Caracter
	totPersona = 0 //Total personas
	totGanador = 0 //Total ganadores
	Repetir
		Imprimir "Men� de opciones"
		Imprimir "1. Leer datos"
		Imprimir "2. Total datos"
		Imprimir "3. Total ganadores/perdedores y porcentajes" 
		Imprimir "4. Salir"
		Imprimir "Ingrese su opci�n: " Sin Saltar
		Leer opc //Opci�n que ingresa el usuario
		Segun opc Hacer
			Caso "1":
				Imprimir "C�digo: " Sin Saltar
				leer codigo
				Imprimir "nota: " Sin Saltar
				leer nota
				totPersona = totPersona + 1
				Si nota >= 3 Entonces
					totGanador = totGanador + 1
				FinSi
			Caso "2":
				Imprimir "Total personas: ", totPersona
			Caso "3":
				totPerdedor = totPersona - totGanador //Total perdedores
				Imprimir "Total personas: ", totPersona
				Imprimir "Total ganadores: ", totGanador
				Imprimir "Total perdedores: ", totPerdedor
				Si totPersona > 0
					ptjeGanador = totGanador * 100 / totPersona //Porcentaje ganadores
					ptjePerdedor = 100 - ptjeGanador
					Imprimir "Porcentaje ganadores: ", ptjeGanador, "%"
					Imprimir "Porcentaje perdedores: ", ptjePerdedor, "%"
				FinSi
			Caso "4":
				Imprimir "***** Programa finalizado *****"
			De Otro Modo:
				Imprimir "Opci�n no v�lida"
		FinSegun				
	Hasta Que opc = "4"
FinAlgoritmo
