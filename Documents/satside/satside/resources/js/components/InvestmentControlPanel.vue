<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
</script>

<template>
    <Card>
        <CardHeader>
            <CardTitle>Simulate Scenarios</CardTitle>
        </CardHeader>
        <CardContent class="space-y-4">
            <div>
                <Label for="scenario-name">Scenario Name</Label>
                <Input id="scenario-name" type="text" placeholder="e.g., Taiwan Conflict" />
            </div>
            <div>
                <Label>Impact on:</Label>
                <div class="grid grid-cols-2 gap-2">
                    <Button variant="outline">Global Markets</Button>
                    <Button variant="outline">Specific Region</Button>
                </div>
            </div>
            <Button>Run Simulation</Button>
        </CardContent>
    </Card>
</template>
