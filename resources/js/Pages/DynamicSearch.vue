<template>
    <div class="grid grid-cols-6 justify-center gap-2">
        <div class="col-span-1 space-y-2">
            <h1 class="bg-green-700 bg-opacity-60 py-2 text-center rounded-md m-2">category 1</h1>
            <h1 class="bg-green-700 bg-opacity-60 py-2 text-center rounded-md m-2">category 2</h1>
            <h1 class="bg-green-700 bg-opacity-60 py-2 text-center rounded-md m-2">category 3</h1>
            <h1 class="bg-green-700 bg-opacity-60 py-2 text-center rounded-md m-2">category 4</h1>
            <h1 class="bg-green-700 bg-opacity-60 py-2 text-center rounded-md m-2">category 5</h1>
        </div>
        <div class="col-span-5">
            <div class="flex justify-start items-center gap-2 mt-4">
                <input class="border border-green-600 focus:outline-none p-1 rounded-md" type="text" name="text" id="text" />
                <button class="border bg-green-700 bg-opacity-60 text-white font-bold rounded-md border-green-600 focus:outline-none p-1">Search</button>
            </div>
            <div class="grid grid-cols-6 justify-center gap-2 mt-4">
                <div class="col-span-1 border border-green-600 rounded-lg shadow-md bg-green-700 bg-opacity-30">
                    <img src="" alt="photo" />
                    <p>description</p>
                    <h1>title</h1>
                </div>
                  <div class="col-span-1 border border-green-600 rounded-lg shadow-md bg-green-700 bg-opacity-30">
                    <img src="" alt="photo" />
                    <p>description</p>
                    <h1>title</h1>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {}
</script>
<style scoped></style>
