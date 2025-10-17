"""
Programa principal de la Tienda de Motos
"""

from motorcycle_store import MotorcycleStore


def print_menu():
    """Muestra el menú principal"""
    print("\n=== TIENDA DE MOTOS ===")
    print("1. Agregar motocicleta")
    print("2. Listar todas las motocicletas")
    print("3. Buscar motocicleta por ID")
    print("4. Buscar motocicletas por marca")
    print("5. Buscar motocicletas por rango de precio")
    print("6. Actualizar motocicleta")
    print("7. Eliminar motocicleta")
    print("8. Salir")
    print("=" * 23)


def add_motorcycle_menu(store):
    """Menú para agregar una motocicleta"""
    print("\n--- Agregar Motocicleta ---")
    brand = input("Marca: ")
    model = input("Modelo: ")
    year = int(input("Año: "))
    price = float(input("Precio: "))
    color = input("Color: ")
    
    moto = store.add_motorcycle(brand, model, year, price, color)
    print(f"\n✓ Motocicleta agregada exitosamente con ID: {moto.motorcycle_id}")


def list_motorcycles_menu(store):
    """Menú para listar motocicletas"""
    motorcycles = store.list_motorcycles()
    if not motorcycles:
        print("\nNo hay motocicletas en el inventario.")
    else:
        print("\n--- Inventario de Motocicletas ---")
        for moto in motorcycles:
            print(moto)


def search_by_id_menu(store):
    """Menú para buscar por ID"""
    motorcycle_id = int(input("\nIngrese el ID de la motocicleta: "))
    moto = store.get_motorcycle(motorcycle_id)
    if moto:
        print(f"\n{moto}")
    else:
        print(f"\n✗ No se encontró motocicleta con ID: {motorcycle_id}")


def search_by_brand_menu(store):
    """Menú para buscar por marca"""
    brand = input("\nIngrese la marca: ")
    motorcycles = store.get_motorcycles_by_brand(brand)
    if not motorcycles:
        print(f"\n✗ No se encontraron motocicletas de la marca: {brand}")
    else:
        print(f"\n--- Motocicletas {brand} ---")
        for moto in motorcycles:
            print(moto)


def search_by_price_range_menu(store):
    """Menú para buscar por rango de precio"""
    min_price = float(input("\nPrecio mínimo: "))
    max_price = float(input("Precio máximo: "))
    motorcycles = store.get_motorcycles_by_price_range(min_price, max_price)
    if not motorcycles:
        print(f"\n✗ No se encontraron motocicletas en el rango ${min_price:,.2f} - ${max_price:,.2f}")
    else:
        print(f"\n--- Motocicletas entre ${min_price:,.2f} y ${max_price:,.2f} ---")
        for moto in motorcycles:
            print(moto)


def update_motorcycle_menu(store):
    """Menú para actualizar motocicleta"""
    motorcycle_id = int(input("\nIngrese el ID de la motocicleta a actualizar: "))
    moto = store.get_motorcycle(motorcycle_id)
    
    if not moto:
        print(f"\n✗ No se encontró motocicleta con ID: {motorcycle_id}")
        return
    
    print(f"\nMotocicleta actual: {moto}")
    print("\nDeje en blanco para no modificar el campo")
    
    updates = {}
    
    brand = input(f"Nueva marca [{moto.brand}]: ")
    if brand:
        updates['brand'] = brand
    
    model = input(f"Nuevo modelo [{moto.model}]: ")
    if model:
        updates['model'] = model
    
    year_str = input(f"Nuevo año [{moto.year}]: ")
    if year_str:
        updates['year'] = int(year_str)
    
    price_str = input(f"Nuevo precio [{moto.price}]: ")
    if price_str:
        updates['price'] = float(price_str)
    
    color = input(f"Nuevo color [{moto.color}]: ")
    if color:
        updates['color'] = color
    
    if updates:
        store.update_motorcycle(motorcycle_id, **updates)
        print("\n✓ Motocicleta actualizada exitosamente")
    else:
        print("\n✓ No se realizaron cambios")


def delete_motorcycle_menu(store):
    """Menú para eliminar motocicleta"""
    motorcycle_id = int(input("\nIngrese el ID de la motocicleta a eliminar: "))
    moto = store.get_motorcycle(motorcycle_id)
    
    if not moto:
        print(f"\n✗ No se encontró motocicleta con ID: {motorcycle_id}")
        return
    
    print(f"\nMotocicleta a eliminar: {moto}")
    confirm = input("¿Está seguro? (s/n): ")
    
    if confirm.lower() == 's':
        store.delete_motorcycle(motorcycle_id)
        print("\n✓ Motocicleta eliminada exitosamente")
    else:
        print("\n✓ Operación cancelada")


def main():
    """Función principal"""
    store = MotorcycleStore()
    
    # Datos de ejemplo
    store.add_motorcycle("Honda", "CBR600RR", 2023, 12000.00, "Rojo")
    store.add_motorcycle("Yamaha", "R1", 2023, 18000.00, "Azul")
    store.add_motorcycle("Kawasaki", "Ninja 650", 2023, 8500.00, "Verde")
    
    while True:
        print_menu()
        try:
            option = input("\nSeleccione una opción: ")
            
            if option == "1":
                add_motorcycle_menu(store)
            elif option == "2":
                list_motorcycles_menu(store)
            elif option == "3":
                search_by_id_menu(store)
            elif option == "4":
                search_by_brand_menu(store)
            elif option == "5":
                search_by_price_range_menu(store)
            elif option == "6":
                update_motorcycle_menu(store)
            elif option == "7":
                delete_motorcycle_menu(store)
            elif option == "8":
                print("\n¡Gracias por usar la Tienda de Motos!")
                break
            else:
                print("\n✗ Opción inválida. Por favor intente nuevamente.")
        except (ValueError, KeyboardInterrupt) as e:
            if isinstance(e, KeyboardInterrupt):
                print("\n\n¡Hasta luego!")
                break
            print(f"\n✗ Error: Entrada inválida. Por favor intente nuevamente.")
        except Exception as e:
            print(f"\n✗ Error inesperado: {e}")


if __name__ == "__main__":
    main()
