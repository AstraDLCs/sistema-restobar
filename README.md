# Colaboracion en la rama dev

## Como colaborar?

### Primero crea un fork

Te diriges a la branch dev y creas un fork para tu repositorio

deseleccionas ```Copy the main branch only```

### una vez con el repositorio en tu perfil, clonaras la branch dev

```bash
git clone -b dev https://github.com/tu-usuario/tu-repositorio.git
```

### una vez terminado tu aporte

te aseguras de estar en la rama dev
```bash
git checkout dev
```
Añades los cambios

```bash
git add .
```

Haces tu commit
```bash
git commit -m "Descripción de los cambios"
```

y finalmente realizas el push a tu repositorio
```bash
git push origin dev
```

### Hacer pull request

En tu repositorio de github, vas a la branch ```dev``` y solicitas un compare pull request, asegurate de tener seleccionado el repositorio base y -la branch dev