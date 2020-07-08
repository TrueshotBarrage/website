CC = gcc
CFLAGS = -g -Wall

all: build clean

BUILDPATH = midi-visualizer/midicsv-build/
	
OBJECTS = $(addprefix $(BUILDPATH),midicsv.o midio.o getopt.o)

build: $(OBJECTS)
	$(CC) $(CFLAGS) -o midi-visualizer/midicsv $(OBJECTS)

clean:
	rm -f $(addprefix $(BUILDPATH),*.o *.bak *.out *.c *.h) Makefile
	rm -r $(BUILDPATH)
