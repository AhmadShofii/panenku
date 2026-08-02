import 'package:flutter/material.dart';
import '../../../data/repositories/auth_repository.dart';
import '../../dashboard/dashboard_page.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState()=>_LoginPageState();
}

class _LoginPageState extends State<LoginPage> with SingleTickerProviderStateMixin {

  final emailController = TextEditingController();
  final passwordController = TextEditingController();
  final authRepository = AuthRepository();

  bool loading=false;
  bool obscure=true;

  late AnimationController animationController;

  @override
  void initState(){
    super.initState();
    animationController=AnimationController(
      vsync:this,
      duration:const Duration(seconds:3),
    )..repeat(reverse:true);
  }

  @override
  void dispose(){
    animationController.dispose();
    emailController.dispose();
    passwordController.dispose();
    super.dispose();
  }

  Future<void> login() async{

    setState(()=>loading=true);

    try{

      final user=await authRepository.login(
        emailController.text.trim(),
        passwordController.text.trim(),
      );

      if(user!=null){

        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content:Text("Selamat datang ${user.email}"),
          ),
        );

        Navigator.pushReplacement(
          context,
          MaterialPageRoute(
            builder:(context)=>const DashboardPage(),
          ),
        );

      }else{

        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content:Text("Login gagal"),
          ),
        );

      }

    }catch(e){

      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content:Text(e.toString()),
        ),
      );

    }

    setState(()=>loading=false);
  }


  @override
  Widget build(BuildContext context){

    return Scaffold(
      backgroundColor:const Color(0xffF4FFF0),
      body:SafeArea(
        child:SingleChildScrollView(
          padding:const EdgeInsets.all(24),
          child:Column(
            children:[

              const SizedBox(height:40),

              AnimatedBuilder(
                animation:animationController,
                builder:(context,child){
                  return Transform.translate(
                    offset:Offset(
                      0,
                      animationController.value*10,
                    ),
                    child:child,
                  );
                },
                child:SizedBox(
                  height:180,
                  width:180,
                  child:Image.asset(
                    'assets/images/farm-3d.png',
                    fit:BoxFit.contain,
                  ),
                ),
              ),

              const SizedBox(height:30),

              const Text(
                "Masuk ke PanenKu",
                style:TextStyle(
                  fontSize:30,
                  fontWeight:FontWeight.bold,
                ),
              ),

              const SizedBox(height:10),

              const Text(
                "Kelola kebun lebih mudah dan modern",
                style:TextStyle(
                  color:Colors.grey,
                ),
              ),

              const SizedBox(height:35),

              TextField(
                controller:emailController,
                decoration:InputDecoration(
                  prefixIcon:const Icon(Icons.email),
                  hintText:"Email",
                  filled:true,
                  fillColor:Colors.white,
                  border:OutlineInputBorder(
                    borderRadius:BorderRadius.circular(20),
                    borderSide:BorderSide.none,
                  ),
                ),
              ),

              const SizedBox(height:15),

              TextField(
                controller:passwordController,
                obscureText:obscure,
                decoration:InputDecoration(
                  prefixIcon:const Icon(Icons.lock),
                  suffixIcon:IconButton(
                    icon:Icon(
                      obscure
                      ? Icons.visibility
                      : Icons.visibility_off,
                    ),
                    onPressed:(){
                      setState(()=>obscure=!obscure);
                    },
                  ),
                  hintText:"Password",
                  filled:true,
                  fillColor:Colors.white,
                  border:OutlineInputBorder(
                    borderRadius:BorderRadius.circular(20),
                    borderSide:BorderSide.none,
                  ),
                ),
              ),

              const SizedBox(height:25),

              SizedBox(
                width:double.infinity,
                height:55,
                child:ElevatedButton(
                  onPressed:loading?null:login,
                  style:ElevatedButton.styleFrom(
                    shape:RoundedRectangleBorder(
                      borderRadius:BorderRadius.circular(20),
                    ),
                  ),
                  child:loading
                  ? const CircularProgressIndicator()
                  : const Text(
                      "Masuk",
                      style:TextStyle(fontSize:18),
                    ),
                ),
              ),

            ],
          ),
        ),
      ),
    );

  }
}