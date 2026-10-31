<x-layouts::app :title="__('Customers')">
    <div class="flex w-full flex-1 flex-col gap-4">
        <flux:heading size="xl">{{ __('Customers') }}</flux:heading>

        <form method="GET" action="{{ route('customers.index') }}" class="flex gap-2">
            <flux:input name="q" value="{{ $search }}" placeholder="Search by customer name" class="flex-1" autofocus />
            <flux:button type="submit" variant="primary">{{ __('Search') }}</flux:button>
        </form>

        @if ($customers->isEmpty())
            <flux:text>{{ __('No customers found.') }}</flux:text>
        @else
            <ul class="divide-y divide-neutral-200 rounded-xl border border-neutral-200 dark:divide-neutral-700 dark:border-neutral-700">
                @foreach ($customers as $customer)
                    <li class="flex items-center justify-between p-4">
                        <div>
                            <div class="font-medium">{{ $customer->name }}</div>
                            <div class="text-sm text-neutral-500">{{ $customer->phone }}</div>
                        </div>
                        <div class="text-sm text-neutral-500">
                            {{ $customer->vehicles_count }} {{ $customer->vehicles_count == 1 ? 'car' : 'cars' }}
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layouts::app>
