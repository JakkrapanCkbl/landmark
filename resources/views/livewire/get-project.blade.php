<div>
    <input wire:model="query" type="text" placeholder="พิมพ์ชื่อโครงการ" class="p-2 hover:bg-slate-200 text-gray-800 border-b">
        <div class="relative">
            <div class="absolute w-full bg-white border">
                @foreach($results as $row)
                    <div class="p-2 hover:bg-slate-200 text-red-800 border-b" wire:click="select('{{ $row->projectname }}')">{{ $row->projectname }}</div> 
                @endforeach
        </div>
    </div>
</div>
