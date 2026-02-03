# AntiSpam for PocketMine-MP

![Version](https://img.shields.io/badge/Release-v1.0.0-blue?style=for-the-badge)
![PocketMine](https://img.shields.io/badge/PMMP-5.0-orange?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.1-777bb4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**AntiSpam Core** es un componente de infraestructura ligero diseñado para la capa de red de servidores PocketMine-MP. Implementa un algoritmo de control de congestión de mensajes para mitigar ataques de spam y mantener la legibilidad del chat.

---

##  Key Features

* **Zero Latency Overhead:** Implementación optimizada mediante estructuras de datos nativas (Arrays) para una búsqueda de $O(1)$.
* **Temporal Validation:** Sistema de validación basado en marcas de tiempo Unix.
* **Event Cancellation:** Interceptación del `PlayerChatEvent` antes de la difusión del paquete a otros clientes.
* **Thread-Safe Logic:** Operaciones ejecutadas de forma síncrona con el hilo principal del servidor para integridad de datos.

## 🛠 Arquitectura del Plugin

El plugin opera bajo un flujo de intercepción de eventos:

1.  **Ingress:** El jugador envía un paquete de chat.
2.  **Filter:** El sistema busca al jugador en el búfer de `cooldown`.
3.  **Validation:** Si $\Delta t < 2s$, el evento se descarta.
4.  **Update:** Si la validación es exitosa, se actualiza el último timestamp.

## Instalación & Setup

### Requisitos Técnicos
* **PocketMine-MP:** API 5.0.0 o superior.
* **PHP:** Versión 8.0 o superior con extensiones habilitadas.

### Guía de Instalación
1. Accede a la carpeta `plugins` de tu servidor.
2. Clona el repositorio o sube el archivo `.phar`.
```bash
git clone [https://github.com/Zieragk/AntiSpam-Core.git](https://github.com/Zieragk/AntiSpam-Core.git)
