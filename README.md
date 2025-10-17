# Tienda de Motos - Sistema de Gestión de Inventario

Sistema de gestión de inventario para una tienda de motocicletas desarrollado en Python.

## Descripción

Este proyecto implementa un sistema completo para gestionar el inventario de una tienda de motocicletas, permitiendo realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre el catálogo de motos.

## Características

- **Gestión de Motocicletas**: Agregar, listar, buscar, actualizar y eliminar motocicletas
- **Búsqueda Avanzada**: 
  - Buscar por ID
  - Buscar por marca
  - Buscar por rango de precio
- **Interfaz de Usuario**: Menú interactivo en consola
- **Tests Unitarios**: Suite completa de pruebas con unittest

## Estructura del Proyecto

```
.
├── motorcycle.py           # Clase Motorcycle
├── motorcycle_store.py     # Clase MotorcycleStore (gestión de inventario)
├── main.py                # Programa principal con interfaz de usuario
├── test_motorcycle_store.py # Tests unitarios
└── README.md              # Este archivo
```

## Requisitos

- Python 3.6 o superior

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Ju4nes1807/3065834-1_CalidadDeSoftware.git
cd 3065834-1_CalidadDeSoftware
```

## Uso

### Ejecutar el programa principal

```bash
python main.py
```

El programa incluye datos de ejemplo y un menú interactivo con las siguientes opciones:

1. Agregar motocicleta
2. Listar todas las motocicletas
3. Buscar motocicleta por ID
4. Buscar motocicletas por marca
5. Buscar motocicletas por rango de precio
6. Actualizar motocicleta
7. Eliminar motocicleta
8. Salir

### Ejecutar los tests

```bash
python -m unittest test_motorcycle_store.py
```

O para ejecutar con más detalle:

```bash
python -m unittest test_motorcycle_store.py -v
```

## Clases Principales

### Motorcycle

Representa una motocicleta con los siguientes atributos:
- `motorcycle_id`: ID único
- `brand`: Marca
- `model`: Modelo
- `year`: Año de fabricación
- `price`: Precio
- `color`: Color

### MotorcycleStore

Gestiona el inventario de motocicletas con los siguientes métodos:
- `add_motorcycle()`: Agregar una nueva moto
- `get_motorcycle()`: Obtener moto por ID
- `list_motorcycles()`: Listar todas las motos
- `update_motorcycle()`: Actualizar datos de una moto
- `delete_motorcycle()`: Eliminar una moto
- `get_motorcycles_by_brand()`: Buscar por marca
- `get_motorcycles_by_price_range()`: Buscar por rango de precio

## Ejemplo de Uso Programático

```python
from motorcycle_store import MotorcycleStore

# Crear tienda
store = MotorcycleStore()

# Agregar motocicletas
moto1 = store.add_motorcycle("Honda", "CBR600RR", 2023, 12000.00, "Rojo")
moto2 = store.add_motorcycle("Yamaha", "R1", 2023, 18000.00, "Azul")

# Listar todas
for moto in store.list_motorcycles():
    print(moto)

# Buscar por marca
hondas = store.get_motorcycles_by_brand("Honda")

# Buscar por rango de precio
motos_rango = store.get_motorcycles_by_price_range(10000, 15000)

# Actualizar
store.update_motorcycle(1, price=11500.00)

# Eliminar
store.delete_motorcycle(2)
```

## Tests

El proyecto incluye una suite completa de tests unitarios que cubren:

- Creación de motocicletas
- Conversión a diccionario
- Representación en string
- Operaciones CRUD del inventario
- Búsquedas avanzadas
- Casos de error y edge cases

## Autor

Proyecto desarrollado para el curso de Calidad de Software (3065834-1)