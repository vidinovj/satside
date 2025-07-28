<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>Controls</CardTitle>
        </CardHeader>
        <CardContent class="space-y-4">
            <div>
                <Label for="country-filter">Filter by Country</Label>
                <Input id="country-filter" type="text" placeholder="e.g., North Korea" />
            </div>
            <div>
                <Label>Simulate Crisis Scenario</Label>
                <div class="grid grid-cols-2 gap-2">
                    <Button variant="outline">Taiwan Conflict</Button>
                    <Button variant="outline">Suez Blockage</Button>
                </div>
            </div>
        </CardContent>
    </Card>
</template>
