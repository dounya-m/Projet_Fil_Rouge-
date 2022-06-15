<template>
    <div class="flex flex-col items-center gap-5">
    <label class="block">
      <span class="sr-only">Choose File</span>
      <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
    </label>
    <label class="flex flex-col items-start" for="">
        <span>Your Description</span>
        <textarea class="border-b-2" name="" id="" ></textarea>
    </label>
    </div>
</template>

<script>
export default{
    name: 'SitterPost'
}
</script>