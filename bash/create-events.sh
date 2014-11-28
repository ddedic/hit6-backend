#!/bin/sh
START=$(date +%s)
for i in {1..500}
do       
    curl -s -X POST http://api.boiler.dev/events/create -d "shop_id=1"  > debug.txt&
    END=$(date +%s)
    DIFF=$(( $END - $START ))
    echo "$i. It took $DIFF seconds"
    sleep 0.1
done
