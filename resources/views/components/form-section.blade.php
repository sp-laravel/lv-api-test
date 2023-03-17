<div {{ $attribute->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
  <div class="px-4 sm:px-0">
    <h3 class="text-lg font-medium text-gray-900">
      {{ $title }}
    </h3>
    <p class="mt-1 text-sm text-gray-600">
      Ingresar los datos solicitados
    </p>
  </div>

  <div class="mt-5 md:mt-0 md:col-span-2">
    <div class="">
      <div class="px-4 py-5 bg-white shadow sm:p-6 rounded-tl-md rounded-tr-md"></div>
      <div class="flex items-center justify-end px-6 py-3 bg-gray-100 shadow rounded-bl-md rounded-br-md">
        {{ $actions }}
      </div>
    </div>
  </div>
</div>
