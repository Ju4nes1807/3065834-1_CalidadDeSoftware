"""
Clase MotorcycleStore - Gestiona el inventario de la tienda de motos
"""

from motorcycle import Motorcycle


class MotorcycleStore:
    """Clase que gestiona la tienda de motocicletas"""
    
    def __init__(self):
        """Inicializa una nueva tienda de motocicletas"""
        self.inventory = {}
        self.next_id = 1
    
    def add_motorcycle(self, brand, model, year, price, color):
        """
        Agrega una nueva motocicleta al inventario
        
        Args:
            brand (str): Marca de la motocicleta
            model (str): Modelo de la motocicleta
            year (int): Año de fabricación
            price (float): Precio de la motocicleta
            color (str): Color de la motocicleta
            
        Returns:
            Motorcycle: La motocicleta agregada
        """
        motorcycle = Motorcycle(self.next_id, brand, model, year, price, color)
        self.inventory[self.next_id] = motorcycle
        self.next_id += 1
        return motorcycle
    
    def get_motorcycle(self, motorcycle_id):
        """
        Obtiene una motocicleta por su ID
        
        Args:
            motorcycle_id (int): ID de la motocicleta
            
        Returns:
            Motorcycle: La motocicleta encontrada o None
        """
        return self.inventory.get(motorcycle_id)
    
    def list_motorcycles(self):
        """
        Lista todas las motocicletas en el inventario
        
        Returns:
            list: Lista de todas las motocicletas
        """
        return list(self.inventory.values())
    
    def update_motorcycle(self, motorcycle_id, **kwargs):
        """
        Actualiza los datos de una motocicleta
        
        Args:
            motorcycle_id (int): ID de la motocicleta
            **kwargs: Atributos a actualizar
            
        Returns:
            bool: True si se actualizó, False si no existe
        """
        motorcycle = self.inventory.get(motorcycle_id)
        if motorcycle:
            for key, value in kwargs.items():
                if hasattr(motorcycle, key):
                    setattr(motorcycle, key, value)
            return True
        return False
    
    def delete_motorcycle(self, motorcycle_id):
        """
        Elimina una motocicleta del inventario
        
        Args:
            motorcycle_id (int): ID de la motocicleta
            
        Returns:
            bool: True si se eliminó, False si no existe
        """
        if motorcycle_id in self.inventory:
            del self.inventory[motorcycle_id]
            return True
        return False
    
    def get_motorcycles_by_brand(self, brand):
        """
        Obtiene motocicletas por marca
        
        Args:
            brand (str): Marca a buscar
            
        Returns:
            list: Lista de motocicletas de la marca
        """
        return [m for m in self.inventory.values() if m.brand.lower() == brand.lower()]
    
    def get_motorcycles_by_price_range(self, min_price, max_price):
        """
        Obtiene motocicletas en un rango de precio
        
        Args:
            min_price (float): Precio mínimo
            max_price (float): Precio máximo
            
        Returns:
            list: Lista de motocicletas en el rango de precio
        """
        return [m for m in self.inventory.values() 
                if min_price <= m.price <= max_price]
