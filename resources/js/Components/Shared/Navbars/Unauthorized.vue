<script setup>
   import { Link } from '@inertiajs/vue3';
</script>
<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <Link 
                class="navbar-brand" 
                href="/">Plantillas de analisis</Link>
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <Link 
                            class="nav-link dropdown-toggle" 
                            href="#" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            Menus Huevos de Helminto
                        </Link>
                        <ul class="dropdown-menu">
                            <li>
                                <Link 
                                    class="dropdown-item" 
                                    href="/acid-alcohols">
                                    Alcoles acidos
                                </Link>
                            </li>
                            <li>
                                <Link 
                                    class="dropdown-item" 
                                    href="/carboys">
                                    Garrafones
                                </Link>
                            </li>
                            <li>
                                <Link 
                                    class="dropdown-item" 
                                    href="/equipment">
                                    Equipamiento
                                </Link>
                            </li>
                            <li>
                                <Link 
                                    class="dropdown-item" 
                                    href="/ethyl-acetates">
                                    Acetatos etilos
                                </Link>
                            </li>
                            <li>
                                <Link 
                                    class="dropdown-item" 
                                    href="/zinc-sulfates">
                                    Sulfatos de zinc
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>