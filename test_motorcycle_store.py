"""
Tests unitarios para la tienda de motocicletas
"""

import unittest
from motorcycle import Motorcycle
from motorcycle_store import MotorcycleStore


class TestMotorcycle(unittest.TestCase):
    """Tests para la clase Motorcycle"""
    
    def test_motorcycle_creation(self):
        """Test de creación de motocicleta"""
        moto = Motorcycle(1, "Honda", "CBR600RR", 2023, 12000.00, "Rojo")
        self.assertEqual(moto.motorcycle_id, 1)
        self.assertEqual(moto.brand, "Honda")
        self.assertEqual(moto.model, "CBR600RR")
        self.assertEqual(moto.year, 2023)
        self.assertEqual(moto.price, 12000.00)
        self.assertEqual(moto.color, "Rojo")
    
    def test_motorcycle_to_dict(self):
        """Test de conversión a diccionario"""
        moto = Motorcycle(1, "Yamaha", "R1", 2023, 18000.00, "Azul")
        moto_dict = moto.to_dict()
        self.assertEqual(moto_dict['motorcycle_id'], 1)
        self.assertEqual(moto_dict['brand'], "Yamaha")
        self.assertEqual(moto_dict['model'], "R1")
    
    def test_motorcycle_str(self):
        """Test de representación en string"""
        moto = Motorcycle(1, "Suzuki", "GSX-R1000", 2023, 15000.00, "Negro")
        str_repr = str(moto)
        self.assertIn("Suzuki", str_repr)
        self.assertIn("GSX-R1000", str_repr)
        self.assertIn("15,000.00", str_repr)


class TestMotorcycleStore(unittest.TestCase):
    """Tests para la clase MotorcycleStore"""
    
    def setUp(self):
        """Configuración inicial para cada test"""
        self.store = MotorcycleStore()
    
    def test_add_motorcycle(self):
        """Test de agregar motocicleta"""
        moto = self.store.add_motorcycle("Kawasaki", "Ninja 650", 2023, 8500.00, "Verde")
        self.assertEqual(moto.brand, "Kawasaki")
        self.assertEqual(moto.model, "Ninja 650")
        self.assertEqual(len(self.store.list_motorcycles()), 1)
    
    def test_get_motorcycle(self):
        """Test de obtener motocicleta por ID"""
        moto = self.store.add_motorcycle("Ducati", "Panigale V4", 2023, 25000.00, "Rojo")
        retrieved = self.store.get_motorcycle(moto.motorcycle_id)
        self.assertEqual(retrieved.brand, "Ducati")
        self.assertEqual(retrieved.model, "Panigale V4")
    
    def test_get_nonexistent_motorcycle(self):
        """Test de obtener motocicleta inexistente"""
        retrieved = self.store.get_motorcycle(999)
        self.assertIsNone(retrieved)
    
    def test_list_motorcycles(self):
        """Test de listar motocicletas"""
        self.store.add_motorcycle("Honda", "CBR1000RR", 2023, 16000.00, "Rojo")
        self.store.add_motorcycle("Yamaha", "MT-09", 2023, 9500.00, "Azul")
        motorcycles = self.store.list_motorcycles()
        self.assertEqual(len(motorcycles), 2)
    
    def test_update_motorcycle(self):
        """Test de actualizar motocicleta"""
        moto = self.store.add_motorcycle("BMW", "S1000RR", 2023, 17000.00, "Blanco")
        result = self.store.update_motorcycle(moto.motorcycle_id, price=16500.00, color="Negro")
        self.assertTrue(result)
        updated = self.store.get_motorcycle(moto.motorcycle_id)
        self.assertEqual(updated.price, 16500.00)
        self.assertEqual(updated.color, "Negro")
    
    def test_update_nonexistent_motorcycle(self):
        """Test de actualizar motocicleta inexistente"""
        result = self.store.update_motorcycle(999, price=5000.00)
        self.assertFalse(result)
    
    def test_delete_motorcycle(self):
        """Test de eliminar motocicleta"""
        moto = self.store.add_motorcycle("Harley-Davidson", "Street 750", 2023, 7500.00, "Negro")
        result = self.store.delete_motorcycle(moto.motorcycle_id)
        self.assertTrue(result)
        self.assertEqual(len(self.store.list_motorcycles()), 0)
    
    def test_delete_nonexistent_motorcycle(self):
        """Test de eliminar motocicleta inexistente"""
        result = self.store.delete_motorcycle(999)
        self.assertFalse(result)
    
    def test_get_motorcycles_by_brand(self):
        """Test de obtener motocicletas por marca"""
        self.store.add_motorcycle("Honda", "CBR600RR", 2023, 12000.00, "Rojo")
        self.store.add_motorcycle("Honda", "CBR1000RR", 2023, 16000.00, "Azul")
        self.store.add_motorcycle("Yamaha", "R1", 2023, 18000.00, "Blanco")
        honda_motos = self.store.get_motorcycles_by_brand("Honda")
        self.assertEqual(len(honda_motos), 2)
        for moto in honda_motos:
            self.assertEqual(moto.brand, "Honda")
    
    def test_get_motorcycles_by_price_range(self):
        """Test de obtener motocicletas por rango de precio"""
        self.store.add_motorcycle("Suzuki", "GSX-R600", 2023, 11000.00, "Azul")
        self.store.add_motorcycle("Kawasaki", "Ninja 650", 2023, 8500.00, "Verde")
        self.store.add_motorcycle("Ducati", "Panigale V4", 2023, 25000.00, "Rojo")
        mid_range = self.store.get_motorcycles_by_price_range(8000.00, 12000.00)
        self.assertEqual(len(mid_range), 2)
        for moto in mid_range:
            self.assertTrue(8000.00 <= moto.price <= 12000.00)


if __name__ == '__main__':
    unittest.main()
