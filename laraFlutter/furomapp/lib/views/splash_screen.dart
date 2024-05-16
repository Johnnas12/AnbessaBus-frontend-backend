import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class SplashScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(
          image: DecorationImage(
            image: AssetImage('assets/img/back.png'), // Replace with your background image path
            fit: BoxFit.cover,
          ),
        ),
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              
                    ClipRRect(
              borderRadius: BorderRadius.circular(100.0), // Adjust the radius as needed
              child: Image.asset(
                'assets/img/logo1.jpg',
                width: 200, // Adjust width as needed
                height: 200, // Adjust height as needed
                fit: BoxFit.cover,
              ),
            ), 
              // Image.asset('assets/img/logo1.jpg', 
              // width: 250,
              // height: 150,), // Replace with your logo image path
              SizedBox(height: 16),
              Text(
                
                
                'Anbessa City Bus',
                style: GoogleFonts.roboto(
                  
                  fontSize: 30,
                  fontWeight: FontWeight.w900,
                  color: Color.fromARGB(255, 233, 246, 94),
                ),
              ),
              SizedBox(height: 8),
              Text(
                'Safe Journey with us',
                style: TextStyle(
                  fontSize: 20,
                  color:  Color.fromARGB(255, 246, 223, 94),
                ),
              ),
              SizedBox(height: 16),
              CircularProgressIndicator(color: Color(0xFFF36D44),), // Loading animation widget
            ],
          ),
        ),
      ),
    );
  }
}