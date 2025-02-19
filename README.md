# Sistema de Gestión para Oficina Jrojasa

Este proyecto es un sistema de gestión desarrollado en PHP vanilla que permite administrar usuarios, clientes, empleados y administradores, así como generar reportes personalizados. El sistema está diseñado para ser utilizado en la Oficina Jrojasa, facilitando la gestión de datos y la generación de informes.

## Módulos del Proyecto

### 1. Módulo de Gestión de Usuarios
- **Registro de usuarios**: Permite registrar nuevos usuarios en el sistema.
- **Activación/Desactivación de usuarios**: Permite activar o desactivar cuentas de usuarios.
- **Login**: Sistema de autenticación para acceder al sistema.
- **Recuperación de cuenta**: Permite recuperar la cuenta en caso de olvido de credenciales.
- **Cambio de clave**: Permite a los usuarios cambiar su contraseña.

### 2. Módulo de Gestión de Clientes
- **CRUD de clientes**: Permite crear, leer, actualizar y eliminar perfiles de clientes.
- **Almacenamiento de información**: Almacena datos de contacto, RIF, usuario y clave de SENIAT y Alcaldía.

### 3. Módulo de Gestión de Empleados y Administradores
- **Acceso a datos de clientes**: Los empleados pueden ver los datos de los clientes, pero no modificarlos.
- **CRUD de empleados**: Permite crear, leer, actualizar y eliminar empleados.
- **CRUD de administradores**: Permite crear, leer, actualizar y eliminar administradores.
- **Permisos de administradores**: Los administradores tienen acceso completo para modificar cualquier dato de clientes y empleados.

### 4. Módulo de Reportes
- **Filtrado de búsquedas**: Permite filtrar clientes según diferentes criterios.
- **Exportación de documentos**: Permite exportar reportes en formato PDF o Excel, mostrando clientes y sus deudas por dependencias.

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/FawziL/Accounting-System
