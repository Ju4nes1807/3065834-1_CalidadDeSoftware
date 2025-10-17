"""
Clase Motorcycle - Representa una motocicleta en la tienda
"""


class Motorcycle:
    """Clase que representa una motocicleta"""
    
    def __init__(self, motorcycle_id, brand, model, year, price, color):
        """
        Inicializa una nueva motocicleta
        
        Args:
            motorcycle_id (int): ID único de la motocicleta
            brand (str): Marca de la motocicleta
            model (str): Modelo de la motocicleta
            year (int): Año de fabricación
            price (float): Precio de la motocicleta
            color (str): Color de la motocicleta
        """
        self.motorcycle_id = motorcycle_id
        self.brand = brand
        self.model = model
        self.year = year
        self.price = price
        self.color = color
    
    def __str__(self):
        """Representación en string de la motocicleta"""
        return (f"ID: {self.motorcycle_id}, {self.brand} {self.model} ({self.year}) - "
                f"Color: {self.color}, Precio: ${self.price:,.2f}")
    
    def to_dict(self):
        """Convierte la motocicleta a diccionario"""
        return {
            'motorcycle_id': self.motorcycle_id,
            'brand': self.brand,
            'model': self.model,
            'year': self.year,
            'price': self.price,
            'color': self.color
        }
