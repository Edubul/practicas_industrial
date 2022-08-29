<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";

const productos = usePage().props.value.productos;
const total_productos = usePage().props.value.total_productos;

</script>


<template>
    <DashboardLayout>
    <!-- This is an example component -->
        <div class="relative py-10 bg-lightBlue-500">
          <div class="px-4 md:px-6 mx-auto w-full">
             <div>
                <div class="flex flex-wrap justify-center">
                   <div class="w-full lg:w-6/12 xl:w-3/12 px-4 mr-5">
                      <div class="relative flex flex-col min-w-0 break-words bg-white rounded-lg mb-6 xl:mb-0 shadow-lg">
                         <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                               <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                  <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total de artículos</h5>
                                  <span class="font-bold text-xl">{{ total_productos }}</span>
                               </div>
                               <div class="relative w-auto pl-4 flex-initial">
                                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"><i class="far fa-chart-bar"></i></div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>

        <div class="p-5">
            <table class="min-w-full divide-y divide-gray-00">
                <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre Producto
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Categoría
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nomenclatura
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr v-for="producto in productos.data">
                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                        {{ producto.nombre_producto }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500 max-w-sm overflow-hidden">
                        {{ producto.descripcion }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        {{ producto.categoria }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        {{ producto.nomenclatura }}
                    </td>
                    <td class="p-4 whitespace-nowrap text-sm mx-auto font-semibold text-gray-900">
                        {{ producto.cantidad }}
                    </td>

                    <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        <a  :href="route('inventario.edit',producto.id)" class="inline-block bg-yellow-500 text-white font-medium text-xs p-2 leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            Editar
                        </a>
                    </td>
                </tr>
                
                </tbody>
            </table>
        </div>
        <pagination
            class="px-5"
            :links="productos.links"
        />
    </DashboardLayout>
</template>
