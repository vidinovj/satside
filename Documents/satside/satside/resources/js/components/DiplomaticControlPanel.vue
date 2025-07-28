<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>Filters & Actions</CardTitle>
        </CardHeader>
        <CardContent class="space-y-4">
            <div>
                <Label for="country-filter">Filter by Country</Label>
                <Input id="country-filter" type="text" placeholder="e.g., Ukraine" />
            </div>
            <div>
                <Label for="event-filter">Filter by Event</Label>
                <Input id="event-filter" type="text" placeholder="e.g., grain deal" />
            </div>
            <div>
                <Label>Simulate Event</Label>
                <div class="grid grid-cols-2 gap-2">
                    <Button variant="outline">UN Speech</Button>
                    <Button variant="outline">Trade Policy Change</Button>
                </div>
            </div>
        </CardContent>
    </Card>
</template>
