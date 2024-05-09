<template >
    <div>
        <section class=" flex justify-center">
            <div>
                <form class="border-t-4 border-b-4 border-blue-100 rounded-lg">
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg focus:border-green-400" placeholder='LIST FOR' id="listfor" type="text">
                        </div>
                    </div>
                    <div class="grid mt-5">
                        <label class="text-green-500 font-bold font-weight-bolder text-xl" for="listdate">list date</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg  focus:border-2 focus:border-green-400" id="listdate" type="date">
                    </div>
                    <div>
                        <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">SAVE</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: "CreateList"
}
</script>
