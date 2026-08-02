import 'package:flutter/material.dart';
import 'core/api/api_client.dart';
import 'core/storage/token_storage.dart';
import 'features/auth/login/login_page.dart';
import 'features/dashboard/dashboard_page.dart';

Future<void> main() async{
  WidgetsFlutterBinding.ensureInitialized();
  await ApiClient.init();
  runApp(const PanenKuApp());
}

class PanenKuApp extends StatelessWidget{
  const PanenKuApp({super.key});

  @override
  Widget build(BuildContext context){
    return MaterialApp(
      debugShowCheckedModeBanner:false,
      title:'PanenKu',
      theme:ThemeData(
        colorScheme:ColorScheme.fromSeed(seedColor:Colors.green),
        useMaterial3:true,
      ),
      home:const SplashPage(),
    );
  }
}

class SplashPage extends StatefulWidget{
  const SplashPage({super.key});

  @override
  State<SplashPage> createState()=>_SplashPageState();
}

class _SplashPageState extends State<SplashPage>{

  @override
  void initState(){
    super.initState();
    checkLogin();
  }

  Future<void> checkLogin() async{
    await Future.delayed(const Duration(seconds:1));

    final hasToken=await TokenStorage.hasToken();

    if(!mounted)return;

    Navigator.pushReplacement(
      context,
      MaterialPageRoute(
        builder:(context)=>hasToken
        ? const DashboardPage()
        : const LoginPage(),
      ),
    );
  }

  @override
  Widget build(BuildContext context){
    return const Scaffold(
      body:Center(
        child:CircularProgressIndicator(),
      ),
    );
  }
}