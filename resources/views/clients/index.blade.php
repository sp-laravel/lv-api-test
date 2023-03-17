<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Clientes
    </h2>
  </x-slot>

  <x-container id="app" class="py-8">
    <x-form-section>
      <x-slot name="title">
        Crear Cliente
      </x-slot>

      <x-slot name="description">
        Ingrese los datos solicitados para poder crear un nuevo cliente
      </x-slot>

      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-4">
          <x-label>
            Nombre
          </x-label>
          <x-input v-model="createForm.name" type="text" class="w-full mt-1" />
        </div>

        <div class="col-span-6 sm:col-span-4">
          <x-label>
            URK de redirección
          </x-label>
          <x-input v-model="createForm.redirect" type="text" class="w-full mt-1" />
        </div>
      </div>

      <x-slot name="actions">
        <x-button>
          Crear
        </x-button>
      </x-slot>
    </x-form-section>
  </x-container>

  @push('js')
    <script>
      new Vue({
        el: "#app",
        data: {
          createForm: {
            name: null,
            redirect: null,
          }
        }
      });
    </script>
  @endpush
</x-app-layout>
